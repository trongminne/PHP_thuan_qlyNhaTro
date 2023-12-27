// Chọn tất cả khu vực

var checkkhuvuc = document.querySelectorAll("#checkkhuvuc");
function checkAll(myCheckbox){
    if(myCheckbox.checked == true){
        checkkhuvuc.forEach(function(checkbox){
            checkbox.checked = true;
        });
    }
    else{
        checkkhuvuc.forEach(function(checkbox){
            checkbox.checked = false;
        });
    }
}

// Chọn tất cả nhà trọ

var checknhatro = document.querySelectorAll("#checknhatro");
function checkAll1(myCheckbox){
    if(myCheckbox.checked == true){
        checknhatro.forEach(function(checkbox){
            checkbox.checked = true;
        });
    }
    else{
        checknhatro.forEach(function(checkbox){
            checkbox.checked = false;
        });
    }
}

// Chọn tất cả tài khoản

var checktaikhoan = document.querySelectorAll("#checktaikhoan");
function checkAll3(myCheckbox){
    if(myCheckbox.checked == true){
        checktaikhoan.forEach(function(checkbox){
            checkbox.checked = true;
        });
    }
    else{
        checktaikhoan.forEach(function(checkbox){
            checkbox.checked = false;
        });
    }
}
// Chọn tất cả tin tức

var checktintuc = document.querySelectorAll("#checktintuc");
function checkAll2(myCheckbox){
    if(myCheckbox.checked == true){
        checktintuc.forEach(function(checkbox){
            checkbox.checked = true;
        });
    }
    else{
        checkkhuvuc.forEach(function(checkbox){
            checkbox.checked = false;
        });
    }
}
