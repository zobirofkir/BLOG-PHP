// $(function(){
//     ("button").on("click", function(){
//         $.ajax({
//             method:"POST", 
//             url:"zobir.php",
//             data: {
//                 username:"username",
//                 email:"email",
//                 password:"password",
//             },
//             success: function(data, status, xhr){
//                 console.log(data);
//                 console.log(status);
//                 console.log(xhr);
//             },
//         });
//     });
// });

// $(function(){
//     ("button").on("click", function(){
//         $.ajax({
//             method:"POST", 
//             url:"http://your-url.php",
//             data:{
//                 username:username,
//                 email:email,
//                 password:password,
//                 retype_password:retype_password,
//                 date:date,
//             },
//             success: function(data, status, xhr){
//                 console.log(data);
//                 console.log(status);
//                 console.log(xhr);
//             },
//             error:function(error, status, xhr){
//                 console.log(error);
//                 console.log(status);
//                 console.log(xhr);
//             },
//         });
//     }) ;
// });

// $(function(){
//     ("button").on("click", function(){
//         $.ajax({
//             method:"POST",
//             url:"http://your-url.php",
//             data:{
//                 username:username,
//                 email:email,
//                 password:password,
//                 retype_password:retype_password,
//                 date:date,  
//             },
//             success:function(status, data, xhr){
//                 console.log(status),
//                 console.log(data),
//                 console.log(xhr)
//             },
//             error: function(error, xhr, status){
//                 console.log(error),
//                 console.log(xhr),
//                 console.log(status)
//             },
//             complete: function(xhr, status){
//                 console.log(xhr),
//                 console.log(status)
//             },
//         });
//     });
// });