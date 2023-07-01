$("#lecturer").click(()=>{
  $("#lecturerSignupForm").css('display','block')
  $("#lecturer").css({'background-color': '#174E80', 'color':'white'})
  $('#student').css({'background-color': 'inherit', 'color':'black'})
  $("#studentSignupForm").css('display','none')
})
$("#student").click(()=>{
  $("#lecturerSignupForm").css('display','none')
  $("#lecturer").css({'background-color': 'inherit', 'color':'black'})
  $('#student').css({'background-color': '#174E80', 'color':'white'})
  $("#studentSignupForm").css('display','block')
})

function studentSignup(event){
  event.preventDefault();
  const formData = new FormData(document.getElementById('studentSignupForm'));
  fetch('../pages/userSignup.php',{
    method: 'POST',
    body: formData
  })
      .then(response => response.json())
      .then(data => {
        console.log(data);
      })
      .catch(error =>{
        console.error(error);
      });
}
function supervisorSignup(event){
  event.preventDefault();
  const formData = new FormData(document.getElementById('supervisorSignupForm'));
  fetch('../pages/userSignup.php',{
    method: 'POST',
    body: formData
  })
      .then(response => response.json())
      .then(data => {
        console.log(data);
      })
      .catch(error =>{
        console.error(error);
      });
}