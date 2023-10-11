<?php

namespace App\Jobs;

use App\Mail\MailReport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if( date('l') !== "Sunday" && date('W') % 2 === 1 ) {
            $end = date('Y-m-d 23:59:59', strtotime('today'));
            $start = date('Y-m-d 00:00:01', strtotime('monday last week'));
            $researcher = DB::table('belongs')
                ->select('codes.id as code_id',
                    'codes.code as code_string',
                    'codes.updated_at as code_activated_time',
                    'codes.code_tea_win as code_tea_win',
                    'codes.code_tea_win_discription as code_tea_win_discription',
                    'codes.code_tea_win_date_delivery as code_tea_win_date_delivery',
                    'codes.code_main_win as code_main_win',
                    'codes.code_main_win_discription as code_main_win_discription',
                    'codes.code_main_win_date_delivery as code_main_win_date_delivery',
                    'belongs.code_id as belongs_client_code_id',
                    'belongs.user_id as belongs_user_id',
                    'belongs.ticket_id as belongs_ticket_id',
                    'tickets.ticket_path as ticket_path',
                    'users.name as user_name',
                    'users.second_name as user_second_name',
                    'users.patronymic as user_patronymic',
                    'users.phone as user_phone',
                    'users.email as user_email'
                )
                ->join('codes', 'codes.id', '=', 'belongs.code_id')
                ->join('tickets', 'tickets.id', '=', 'belongs.ticket_id')
                ->join('users', 'belongs.user_id', '=', 'users.id')
                ->where('belongs.created_at', '>', $start)
                ->where('belongs.created_at', '<', $end)
                ->get();
            $spreadsheet = new Spreadsheet();
            $activeWorksheet = $spreadsheet->getActiveSheet();
            //return $queue_record;

            $activeWorksheet->setCellValue('A1', "Имя");
            $activeWorksheet->setCellValue('B1', "Фамилия");
            $activeWorksheet->setCellValue('C1', "Отчество");
            $activeWorksheet->setCellValue('D1', "Телефон");
            $activeWorksheet->setCellValue('E1', "Почта");
            $activeWorksheet->setCellValue('F1', "Чек");
            $activeWorksheet->setCellValue('G1', "Код");


            $styleArray = [
                'font' => [
                    'bold' => true,
                ],

                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'rotation' => 90,
                    'startColor' => [
                        'argb' => 'FFFFFF00',
                    ],
                    'endColor' => [
                        'argb' => 'FFFFFF00',
                    ],
                ],
            ];
            $aligner = [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                ],
            ];
            $spreadsheet->getActiveSheet()->getStyle('A1:E1')->applyFromArray($styleArray);
            $spreadsheet->getActiveSheet()->getStyle('A1:E500')->applyFromArray($aligner);
            $spreadsheet->getActiveSheet()->setAutoFilter('C1:C500');
            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);


            foreach ($researcher as $key => $error) {
                $activeWorksheet->setCellValue('A' . ($key + 2), $error->user_name);
                $activeWorksheet->setCellValue('B' . ($key + 2), $error->user_second_name);
                $activeWorksheet->setCellValue('C' . ($key + 2), $error->user_patronymic);
                $activeWorksheet->setCellValue('D' . ($key + 2), $error->user_phone);
                $activeWorksheet->setCellValue('E' . ($key + 2), $error->user_email);
                $activeWorksheet->setCellValue('F' . ($key + 2), $error->ticket_path);
                $activeWorksheet->setCellValue('G' . ($key + 2), $error->code_string);

            }
            $writer = new Xlsx($spreadsheet);
            $report_name = "Отчет_промо_NIktea_2023.xlsx";


            $writer->save($report_name);
            $oldFilePath = $report_name;
            $newFilePath = "./reports/" . time() . $report_name;

            $newFolderPath = pathinfo($newFilePath)["dirname"];
            if (file_exists($newFolderPath) || mkdir($newFolderPath, 0755, true) || is_dir($newFolderPath)) {
                rename($oldFilePath, $newFilePath);
            }
            $mails = [
                "dimaprogma@gmail.com",
                "melesin@alephtrade.com",
                "iuiskra@alephtrade.com",
                "yesokolova@alephtrade.com",
                "emishina@alephtrade.com"
            ];
            foreach ($mails as $mail) {
                Mail::to($mail)->send(new MailReport($start, $end, $newFilePath));
            }
        }
    }
}
