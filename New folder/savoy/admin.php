<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="container3">
<div class="selection">
    <h1>Select your Dashboard</h1>
<a href="admin_dashboard.php"> Admin </a>
<a href="staff.php">Staff</a>
</div></div>


<style>
    .container3{
        display:flex;
        justify-content: center;
        align-items: center;
        margin: 100px;
    }
    .selection{
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap:20px;
        background: linear-gradient(rgb(0,0,0,0.7),rgb(0,0,0,0.8));
        
        width:50%;

}
.selection a:hover{
    background: linear-gradient(45deg, white,silver);
    transition: all 0.3s ease-in;
    color:rgb(0,0,0,0.6);
}
.selection a{
    padding:20px;
    background: white;
    color:red;
    font-size: 20px;
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
    border-radius: 4px;
    box-shadow: 0 0 10px rgb(0,0,0,0.9);
    width: 30%;
    font-weight: 500;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

}
</style>


</body>

</html>