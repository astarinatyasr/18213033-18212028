import socket
HOST = '192.168.1.110'  #server name goes in here
PORT = 11309            #port number goes in here
socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
socket.bind((HOST, PORT))
socket.listen(1)
conn, addr = socket.accept()

with open('abc.txt', 'rb') as file_to_send:
    for data in file_to_send:
        conn.sendall(data)


with open('def.txt', 'rb') as file_to_send:
    for data in file_to_send:
        conn.sendall(data)

socket.close()
