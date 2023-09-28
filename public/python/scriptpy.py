from ftplib import FTP

# Informations de connexion FTP
ftp_host = '172.16.0.38'
ftp_user = 'usaouiraa'
ftp_pass = 'Saouiraa15TRans'

# Chemin distant sur le serveur FTP
remote_path = '.'

# Chemin local vers le fichier .x
local_file_path = 'C:\Users\LENOVO\OneDrive\Bureau\message.x'

try:
    # Établir une connexion FTP
    ftp = FTP(ftp_host)
    ftp.login(ftp_user, ftp_pass)

    # Transférer le fichier .x
    with open(local_file_path, 'rb') as local_file:
        ftp.storbinary('STOR {}/votre_fichier.x'.format(remote_path), local_file)

    # Fermer la connexion FTP
    ftp.quit()
    print('Transfert FTP réussi.')

except Exception as e:
    print('Erreur lors du transfert FTP :', str(e))
