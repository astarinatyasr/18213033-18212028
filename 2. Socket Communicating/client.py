import socket

HOST = '192.168.1.110'    #server name goes in here
PORT = 11309             #port number goes in here
socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
socket.connect((HOST,PORT))


msg = raw_input('Enter your name: ')
while(1):
    print 'Hello',
    print msg,
    print '!',
    print 'Welcome to my page!'
    print 'Click "1" to download and read the content of abc.txt '
    print 'Click "2" to download and read the content of def.txt '
    
    x = raw_input('Enter your choice: ')
    
    if x == "1":
        with open('myTransfer.txt', 'wb') as file_to_write:
            while True:
                data = socket.recv(1024)
                print data
                if not data:
                    break
                file_to_write.write(data)
    elif x == "2":
        with open('myTransfer.txt', 'wb') as file_to_write:
            while True:
                data = socket.recv(1024)
                print data
                if not data:
                    break
                file_to_write.write(data)
    raise SystemExit
socket.close()

