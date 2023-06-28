const validation = new JustValidate("#signup");

validation
    .addField("#fistName", [
        {
            rule: "required"
        }
    ])
    .addField("#lastName", [
        {
            rule: "required"
        }
    ])
    .addField("#regNo", [
        {
            rule: "required"
        }
    ])

    .addField("#email", [
        {
            rule: "required"
        },
        {
            rule: "email"
        },
        {
            validator: (value) => () => {
                return fetch("validate-email.php?email=" + encodeURIComponent(value))
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(json) {
                        return json.available;
                    });
            },
            errorMessage: "email already taken"
        }
    ])
    .addField("#class", [
        {
            rule: "required"
        }
    ])
    .addField("#newPassword", [
        {
            rule: "required"
        },
        {
            rule: "password"
        }
    ])
    .addField("#confirmPassword", [
        {
            validator: (value, fields) => {
                return value === fields["#newPassword"].elem.value;
            },
            errorMessage: "Passwords should match"
        }
    ])
    .onSuccess((event) => {
        document.getElementById("signup").submit();
    });