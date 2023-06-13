<form id="userForm" action="../partials/main.php" method="POST" hidden>
    <div class="inputform">
        <div class="userInput">
            <input type="text" id="name" placeholder="Name" name="name" required><br>
            <input type="text" id="username" placeholder="Username" name="username" required><br>
            <input type="email" id="email" placeholder="Email" name="email" required><br>
            <input type="text" id="street" placeholder="Street" name="street" required><br>
            <input type="text" id="suite" placeholder="Suite" name="suite" required><br>
            <input type="text" id="city" placeholder="City" name="city" required><br>
        </div>
        <div class="userInput">
            <input type="text" id="zipcode" placeholder="Zipcode" name="zipcode" required><br>
            <input type="text" id="phone" placeholder="Phone" name="phone" required><br>
            <input type="text" id="website" placeholder="Website" name="website" required><br>
            <input type="text" id="company_name" placeholder="Company Name" name="company_name" required><br>
            <input type="text" id="catch_phrase" placeholder="Catch Phrase" name="catch_phrase" required><br>
            <input type="text" id="bs" name="bs" placeholder="BS" required><br>
        </div>
    </div>
    <div class="centerButton">
        <button type="submit" class="submitForm">Add User</button>
    </div>
</form>
