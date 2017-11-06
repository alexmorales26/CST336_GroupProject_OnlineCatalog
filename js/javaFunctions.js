function confirmCheckOut()
{
   if(confirm("Do you wish to check out ?")){
       window.open("checkout.php");
   }
   else{
       return;
   }
}
$("#checkoutBtn").click(function(){
    confirmCheckOut();
});
