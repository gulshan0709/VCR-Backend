
const fname = document.getElementById('fname');
const lname = document.getElementById('lname');
const email = document.getElementById('email');
const phone = document.getElementById('phone');
const address = document.getElementById('address');
const dob = document.getElementById('dob');


const subject_code = document.getElementById('subject_code');
const sname = document.getElementById('sname');
const cname = document.getElementById('cname');

const subject = document.getElementById('subject');


let validUsersname = false;
let validSubject_code = false;
let validUsercname = false;
let validUserfname = false;
let validUserlname = false;
let validEmail = false;
let validPhone = false;
let validAddress = false;
let validDOB =false;

let validSubject =false;




if(cname){
 cname.addEventListener('blur', ()=>{
    console.log("cname is blurred");
    // Validate first_name here
    let regex = /^\W*(\w+(\W+|$)){1,5}$/;
    let str = cname.value;
    console.log(regex, str);
    if(regex.test(str)){
        console.log('Your fname is valid');
        cname.classList.remove('is-invalid');
        validUsercname = true;
    }
    else{
        console.log('Your fname is not valid');
        cname.classList.add('is-invalid');
        validUsercname = false;
        
    }
})
}

if(fname){
fname.addEventListener('blur', ()=>{
    console.log("fname is blurred");
    // Validate first_name here
    let regex = /^[a-zA-Z]([a-zA-Z]){2,10}$/;
    let str = fname.value;
    console.log(regex, str);
    if(regex.test(str)){
        console.log('Your fname is valid');
        fname.classList.remove('is-invalid');
        validUserfname = true;
    }
    else{
        console.log('Your fname is not valid');
        fname.classList.add('is-invalid');
        validUserfname = false;
        
    }
})
}

if(lname)
{
lname.addEventListener('blur', ()=>{
    console.log("lname is blurred");
    // Validate first_name here
    let regex = /^[a-zA-Z]([a-zA-Z]){2,10}$/;
    let str = lname.value;
    console.log(regex, str);
    if(regex.test(str)){
        console.log('Your fname is valid');
        lname.classList.remove('is-invalid');
        validUserlname = true;
    }
    else{
        console.log('Your fname is not valid');
        lname.classList.add('is-invalid');
        validUserlname = false;
        
    }
})
}



if(phone){
phone.addEventListener('blur', ()=>{
    console.log("phone is blurred");
    // Validate phone here
    let regex = /^([0-9]){10}$/;
    let str = phone.value;
    console.log(regex, str);
    if(regex.test(str)){
        console.log('Your phone is valid');
        phone.classList.remove('is-invalid');
        validPhone = true;
    }
    else{
        console.log('Your phone is not valid');
        phone.classList.add('is-invalid');
        validPhone = false;
        
    }
})
}


if(email)
{
email.addEventListener('blur', ()=>{
    console.log("email is blurred");
    // Validate email here
    let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
    let str = email.value;
    console.log(regex, str);
    if(regex.test(str)){
        console.log('Your email is valid');
        email.classList.remove('is-invalid');
        validEmail = true;
    }
    else{
        console.log('Your email is not valid');
        email.classList.add('is-invalid');
        validEmail = false;
    }
})
}


if(address){
address.addEventListener('blur', ()=>{
    console.log("Address is blurred");
    // Validate phone here
    let regex =/^\W*(\w+(\W+|$)){5,25}$/;
    let str = address.value;
    console.log(regex, str);
    if(regex.test(str)){
        console.log('Your Address is valid');
        address.classList.remove('is-invalid');
        validAddress = true;
    }
    else{
        console.log('Your address is not valid');
        address.classList.add('is-invalid');
        validAddress = false;
        
    }
})
}

if(dob)
{
dob.addEventListener('blur', ()=>{
    console.log("DOB is blurred");
    
    let regex = /^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;
    let str = dob.value;
    console.log(regex, str);
    if(regex.test(str)){
        console.log('Your email is valid');
        dob.classList.remove('is-invalid');
        validDOB = true;
    }
    else{
        console.log('Your Date of birth is not valid');
        dob.classList.add('is-invalid');
        validDOB = false;
    }
})
}



if(subject_code)
{
subject_code.addEventListener('blur', ()=>{
    console.log("student name is blurred");
    // Validate first_name here
    let regex = /^\W*(\w+(\W+|$)){1,5}$/;
    let str = subject_code.value;
    console.log(regex, str);
    if(regex.test(str)){
        console.log('Your fname is valid');
        subject_code.classList.remove('is-invalid');
        validSubject_code = true;
    }
    else{
        console.log('Your fname is not valid');
        subject_code.classList.add('is-invalid');
        validSubject_code = false;
        
    }
})
}

if(sname)
{
sname.addEventListener('blur', ()=>{
    console.log("student name is blurred");
    // Validate first_name here
    let regex = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
    let str = sname.value;
    console.log(regex, str);
    if(regex.test(str)){
        console.log('Your fname is valid');
        sname.classList.remove('is-invalid');
        validUsersname = true;
    }
    else{
        console.log('Your fname is not valid');
        sname.classList.add('is-invalid');
        validUsersname = false;
        
    }

})
}