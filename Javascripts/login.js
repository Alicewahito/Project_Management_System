function studentLogin(event){
    event.preventDefault();
    const formData = new FormData(document.getElementById('student-login-form'));
    fetch('studentLogin.php',{
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
function supervisorLogin(event){
    event.preventDefault();
    const formData = new FormData(document.getElementById('supervisor-login-form'));
    fetch('supervisorLogin.php',{
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