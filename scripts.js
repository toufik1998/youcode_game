


document.querySelector("#addButton").addEventListener("click", ()=>{
    // clearForm();

    document.querySelector("#task-save-btn").style.display = 'block';
    // document.querySelector("#task-delete-btn").style.display = 'none';
    document.querySelector("#task-update-btn").style.display = 'none';
});




function editTask(id){
    document.querySelector("#task-save-btn").style.display = 'none';
    document.querySelector("#task-update-btn").style.display = 'block';

    document.querySelector("#product-id").value = id;
	console.log(id);

    $.ajax({
        type: "POST",
        url: 'scripts.php',
        data: {openTask : id},
        success: function (obj) {
            console.log(obj);
            document.getElementById('product-name').value                                    = obj[0];
            document.getElementById('product-amount').value                                  = obj[1];
            document.getElementById('product-date').value                                    = obj[2];
            document.getElementById('product-price').value                                   = obj[3];
            document.getElementById('product-description').value                             = obj[4];
        }
    });

}

function deleteProduct(){
    if(confirm('Do you want To delete this Product : ') == true){
        document.querySelector("#buttonDelete").click();
    }
}


// signupForm.addEventListener("submit", (e) =>{
//     let regexName = /^[a-z0-9_-]{3,15}$/;
//     let regexEmail = /[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/;
//     let regexPassword = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$/;


//     if(!regexName.test(userName.value)){
//         e.preventDefault();
//         userName.innerText = 'Please enter a valid user name';
//         userName.style.border = '1px solid red';
//     }

// });

// userName.onblur = function () {
//     let regexName = /^[a-z0-9_-]{3,15}$/;
    
//     if(!regexName.test(userName.value)){
//         userName.innerText = 'Please enter a valid user name';
//         userName.style.border = '1px solid red';
//     }
// }

