def generate_password(username):
    password = 0
    for char in username:
        password += ord(char)
    return str(password)

# Exemple d'utilisation
username = input("Entrez le nom d'utilisateur : ")
password = generate_password(username)
print("Le mot de passe correspondant est :", password)
