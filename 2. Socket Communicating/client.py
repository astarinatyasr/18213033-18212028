#!/usr/bin/python

import socket

s = socket.socket()
s.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
host = socket.gethostname()
port = 8888
data = None

s.connect((host, port))
print s.recv(1024)
while (data != "exit"):
        data = raw_input()
        s.sendall(data)
        if data == "exit" :
                print '\n--exiting--\n'
                break
        print s.recv(1024)
s.close
