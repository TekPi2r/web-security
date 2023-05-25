encrypted_flag = "3c09431700451c00232d19531900026c1e2a09431f7e38075d527e1052"
key = "Th1s_1s_@_x0r_k3y_l0l!"
flag = ""

for i in range(len(encrypted_flag)//2):
    encrypted_byte = encrypted_flag[i*2 : (i+1)*2]
    decrypted_byte = chr(int(encrypted_byte, 16) ^ ord(key[i % len(key)]))
    flag += decrypted_byte

print("Decrypted Flag:", flag)
