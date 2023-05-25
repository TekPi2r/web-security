def reverse_pass():
    flag = "K@UC,bswslubr.wohp.dibokdmdb"
    output = ""

    i = 0
    while i < len(flag):
        output += chr(ord(flag[i]) ^ 1)
        output += chr(ord(flag[i + 1]) ^ 3)
        output += chr(ord(flag[i + 2]) ^ 3)
        output += chr(ord(flag[i + 3]) ^ 7)
        i += 4

    return output

pass_value = reverse_pass()
print("The pass is:", pass_value)
