const validation = new JustValidate("#signup");

validation
    .addField("#nom", [
        {
            rule: "required"
        }
    ])

    .addField("#prenom", [
        {
            rule: "required"
        }
    ])

    
    .addField("#password", [
        {
            rule: "required"
        },
        {
            rule: "password"
        }
    ])
    .addField("#password_confirmation", [
        {
            validator: (value, fields) => {
                return value === fields["#password"].elem.value;
            },
            errorMessage: "Passwords should match"
        }
    ])

    .addField('#acceptcheckbox',
        [
          {
            rule: 'required',
          },
        ],
        {
          errorMessage: "Vous devez accepter les CGU",
        }
      )

    .onSuccess((event) => {
        document.getElementById("signup").submit();
    });