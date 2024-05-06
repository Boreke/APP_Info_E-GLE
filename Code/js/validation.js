const validation = new JustValidate("#signup");

validation

    .addField("#password_confirmation", [
        {
            validator: (value, fields) => {
                return value === fields["#password"].elem.value;
            },
            errorMessage: "Passwords should match"
        }
    ])

    .onSuccess((event) => {
        document.getElementById("signup").submit();
    });