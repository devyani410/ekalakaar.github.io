const express=require("express");
const app=express();
const path=require("path");
// require("./db/conn");
// const Register=require("./models/register");

const  port=process.env.PORT|| 3000;
app.use(express.json());
app.use(express.urlencoded({extended:false}));

app.get("/",(req,res)=>{
  res.render("index");
});

app.listen(port,()=>{
  console.log(`server is running ar port no ${port} deni`);
});
function add_data() {
  const { throws } = require('assert');
var mysql =require('mysql');
const { rootCertificates } = require('tls');
var con=mysql.createConnection({
    host:'localhost',
    user:'root',
    password:'eKalakaar',
    database:'sign_in'
});
const name = document.getElementById('name');
const  phone =document.getElementById('phone');
const email =document.getElementById('email');
const password=document.getElementById('password');
var str1='INSERT INTO  sign_in (name,phone,email,password) VALUES ('+'"'+name+'"'+','+phone+',"'+email+'"'+',"'+password+'")';
console.log("hiiiiiiiiiiiii");
console.log(name);
console.log(email);
console.log(phone);
console.log(password);

con.query(str1,(function(err,result){
  if(err) throw err;
  else 
    {
    console.log("your all result are here ",result);
    }
}));
}
console.log();

// con.query("select * from persons1",(function(err,result){
//     if(err) throw console.error(err);
//     else 
//       {
//       console.log("your all result are here ",result);
//       }
//   }));
//   con.query(str1,(function(err,result){
//     if(err) throw err;
//     else 
//       {
//       console.log("your all result are here ",result);
//       }
//   }));
//   con.query("select * from persons1",(function(err,result){
//     if(err) throw console.error(err);
//     else 
//       {
//       console.log("your all result are here ",result);
//       }
//   }));