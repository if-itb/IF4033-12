Pembagian tugas :
Satria Ady Pradana : upload file
Agnes Theresia : login dan register
Gabrielle Wicesawati P : forget password

Skema keamanan yang diterapkan:
password disimpan dalam database dengan enkripsi reverse(sha1(password.salt))
lalu salt nya sendiri didapakan dari substring(md5(username.date),0,32)


upload file hanya mengupload file gambar. File gambar yang diuplod akan ditaruh dalam folder yang khusus untuk seorang pengguna. Penamaan dari folder yang dipakai sebagai tempat penyimpanan adalah username+4 digit dari hash function nama user

jika forget password maka akan diminta alamat email dan akan dikirimkan token ke email tersebut. Lalu token akan dicocokkan  dengan alamat email dan password baru dari user.

Untuk saat ini web app dapat dijalankan pada localhost saja. 
