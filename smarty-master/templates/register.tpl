<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Yiponline - Interview Task By Olubusayo Samuel Idebi(Software Engineer)</title>
{literal}
<style>
header{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 60px;
    background-color: lightseagreen;
    color: black; 
    text-align: center;
}

section{
    margin-top: 70px;
    margin-left: 15%;
    width: 70%;
    padding: 10px;
    box-shadow: 3px 4px 8px 6px rgba(0,0,0,0.4);
}

fieldset{
    background-color: white;
}

.error_message{
    color: red;
    font-size: 14px;
}

.success_message{
    color: green;
    font-size: 14px;
}

.success{
    padding: 10px;
    margin-bottom: 10px;
    font-size: 18px;
    color: lightseagreen;
}

.filed{
    margin-top: 10px;
}

.label{
    width:100%;
    font-size: 14px;
    color: black;
}

.input{
    width:100%;
    height: 35px;
    color: black;
}

.reg{
    width: 50%;
    height: 40px;
    background-color: black;
    color: white;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    box-shadow: 2px 3px 6px 4px rgba(0,0,0,0.4);
}

b{
    font-size: 22px;
    font-weight: bolder;
}
</style>
{/literal}
</head>
<body>
    <header> <h3>Interview Task By Olubusayo Samuel Idebi(Software Engineer)</h3></header>
    <section>
        <fieldset>
            <legend>Registration Form</legend>
            <form action="" method="POST" enctype="multipart/form-data">
                <span class="error_message">{$error_message}</span>
                <span class="success_message">{$success_message}</span>

                <div class="success">{$output_all}</div>

                <div class="filed">
                    <label class="label">Username</label>
                    <input class="input" type="text" name="username" placeholder="Username" value="{$username}" />
                </div>

                <div class="filed">
                    <label class="label">Email</label>
                    <input class="input" type="text" name="email" placeholder="Email" value="{$email}" />
                </div>

                <div class="filed">
                    <label class="label">Password</label>
                    <input class="input" type="text" name="password" placeholder="Password" value="{$password}" />
                </div>
                
                <div class="filed">
                    <button class="reg">Register</button>
                </div>
            </form>
        </fieldset>
    </section>
    <footer></footer>
</body>
</html>