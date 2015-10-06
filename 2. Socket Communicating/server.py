import socket
import sys
from thread import *

HOST = '100.100.101.88'	# Insert your host name
PORT = 8888	# Arbitrary non-privileged port
add = None

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
print 'Socket created'

#Bind socket to local host and port

try:
    s.bind((HOST, PORT))
except socket.error , msg:
    print 'Bind failed. Error Code : ' + str(msg[0]) + ' Message ' + msg[1]
    sys.exit()

print 'Socket bind is completed'


#Start listening on socket
s.listen(10)
print 'Socket is now listening'

#Function for handling connections. This will be used to create threads
def clientthread(conn):
    #Sending message to connected client
    conn.send("Welcome to my page! \n Type 'list' to show the list of available files\n Type 'exit' to quit this program") #send only takes string
        
    #infinite loop so that function do not terminate and thread do not end.
    while(1):
            
            #Receiving from client
            data = conn.recv(1024)
            print data

            if not data:
                    break
            elif data == 'list' :
                    reply = 'Here is the list of text files in the directory...\n Type a/b/c to download and read the content of the file!\n' + data + ':\na). a.txt\nb). b.txt\nc). c.txt'
                    conn.sendall(reply)
            elif data == 'a' :
                    fo = open("a.txt","r+")
                    st = fo.read(300)
                    reply = 'OK..\n' + "opening "+fo.name+"\n.\n.\n.\n.\nClick the Enter button!"
                    conn.sendall(reply)
                    conn.sendall(st)
                    fo.close()
            elif data == 'b' :
                    fo = open("b.txt","r+")
                    st = fo.read(300)
                    reply = 'OK..\n' + "opening "+fo.name+"\n.\n.\n.\n.\nClick the Enter button!"
                    conn.sendall(reply)
                    conn.sendall(st)
                    fo.close()
            elif data == 'c' :
                    fo = open("c.txt","r+")
                    st = fo.read(300)
                    reply = 'OK..\n' + "opening "+fo.name+"\n.\n.\n.\n.\nClick the Enter button!"
                    conn.sendall(reply)
                    conn.sendall(st)
                    fo.close()
            elif data == "exit" :
                    print 'Disconnected with ' + add[0] + ':' + str(add[1])
                    break
            else :
                    reply = "wrong command"
                    conn.sendall(reply)
                            
    #came out of loop
    conn.close()

#now keep talking with the client
while 1:
    #wait to accept a connection - blocking call
        conn, addr = s.accept()
        print 'Connected with ' + addr[0] + ':' + str(addr[1])
        add = addr
        
        #start new thread takes 1st argument as a function name to be run, second is the tuple of arguments to the function.
        start_new_thread(clientthread ,(conn,))

s.close()
