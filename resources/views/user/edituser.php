<html>

   <head>
      <title>Edit User</title>
   </head>

   <body>
      <form action = "/user/edit" method = "post">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
      
         <table>
            <tr>
               <td>Name</td>
               <td><input type = "text" name = "name" /></td>
            </tr>
            <tr>
               <td>Email</td>
               <td><input type = "email" name = "email" /></td>
            </tr>
                <tr>
               <td colspan = "2" align = "center">
                  <input type = "submit" value = "Edit" />
               </td>
            </tr>
         </table>
      
      </form>
   </body>
</html>