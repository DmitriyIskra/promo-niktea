// let formTest = document.getElementById('testForm');

// formTest.onsubmit = async (e) => {
//     e.preventDefault();

//     let response = await fetch('https://dev.nikteaworld.com/api/auth/register', {
//       method: 'POST',
//       body: new FormData(formTest)
//     });

//     let result = await response.json();

//     alert(result.message);
//     console.dir(result)
//   };

//   var myHeaders = new Headers();
// myHeaders.append("Cookie", "nektia_session=PhDT1C9zXeiXEOqgcTcL43QljcFHiam2d6Sq5G12");




const form = document.getElementById('form');

form.addEventListener('submit', async event => {
  event.preventDefault();

  const formData = new FormData(form);

  // 👇️ pass form data to URLSearchParams() constructor
  const searchParams = new URLSearchParams(formData);

  // 👇️ username=ab&password=cd
  console.log(searchParams.toString());

    console.log(formData)

  try {
    const res = await fetch(
      'https://dev.nikteaworld.com/api/auth/register',
      {
        method: 'POST',
        body: searchParams,
      },
    );

    const resData = await res.json();

    console.log(resData);
  } catch (err) {
    console.log(err.message);
  }
});
