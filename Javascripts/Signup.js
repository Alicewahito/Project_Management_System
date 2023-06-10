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