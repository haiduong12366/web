function kiemtra()
{
    //check name
    let kiemtraloi =false
    let name = document.getElementById('name').value
    if(name.length === 0)
    {
        document.getElementById('name_error').innerHTML = 'Tên không được để trống'
        kiemtraloi = true
    }
    else
        document.getElementById('name_error').innerHTML = ''

    
    //phone_number
    let phone_number = document.getElementById('phone_number').value
    if(phone_number.length === 0)
    {
        document.getElementById('phone_number_error').innerHTML = 'SĐT không được để trống'
        kiemtraloi = true
    }
    else
        document.getElementById('phone_number_error').innerHTML = ''

    //address
    let address = document.getElementById('address').value
    if(name.length === 0)
    {
        document.getElementById('address_error').innerHTML = 'Địa chỉ không được để trống'
        kiemtraloi = true
    }
    else
        document.getElementById('address_error').innerHTML = ''


    //check password
    let regex_password = /^[a-z A-Z0-9]{3,}$/gm
    let password = document.getElementById('password').value
    if(password.length == 0 )
    {
        document.getElementById('password_error').innerHTML = 'Mật khẩu không được để trống'
        kiemtraloi = true
    }
    else if(regex_password.test(password) == false)
    {
        document.getElementById('password_error').innerHTML = 'Mật khẩu ít nhất 3 ký tự'
    }
    else
        document.getElementById('password_error').innerHTML = ''
    
    
    //check email
    let email = document.getElementById('email').value
    let regex_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
    if(email.length === 0)
    {
        document.getElementById('email_error').innerHTML = 'Email không được để trống'
        kiemtraloi = true
    }
    else if(regex_email.test(email)==false)
    {
        document.getElementById('email_error').innerHTML = 'Email không hợp lệ'
        kiemtraloi = true
    }
    else
        document.getElementById('email_error').innerHTML = ''
        
    if(kiemtraloi)
    {
        return false;
    }
}