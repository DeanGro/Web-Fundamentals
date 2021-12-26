<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet">
    <script>
        const validateForm = () => {
            const form = document.forms['registerUser'];
            // maybe loop all values instead?
            const firstName = form['firstName'].value;
            const lastName = form['lastName'].value;
            const age = form['age'].value;
            const interests = form['interests'].value;
            const telephone = form['telephone'].value;
            if (!firstName && !lastName && !age && !interests && !telephone) {
                // add CSS to specific labels
                alert('all values are required');
                return false;
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <form name="registerUser" action="assets/php/createUser.php" onsubmit="return validateForm()"  method="post">
            <div class="row align-items-center">
                <h1>Create Account</h1>
                <label for="firstName">First name:</label><br>
                <input type="text" id="firstName" name="firstName"><br>
                <label for="lastName">Last name:</label><br>
                <input type="text" id="lastName" name="lastName"><br>
                <label for="age">Age:</label><br>
                <input type="text" id="age" name="age"><br>
                <label for="interests">Interests:</label><br>
                <input type="text" id="interests" name="interests"><br>
                <label for="telephone">Telephone:</label><br>
                <input type="text" id="telephone" name="telephone"><br>
                <input type="submit" value="Register" name="submit"><br><br><br>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>