// profile-image
$("#profile-image").click((e)=>{
    // alert("Ahmed")
    document.getElementById('image').click();
    document.getElementById('image').onchange = ()=>{
        document.getElementById('submit').click();
    }
})
