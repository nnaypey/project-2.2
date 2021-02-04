package server;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.net.Socket;
import java.io.*;

public class ServerConnection extends Thread {

	Socket socket;
	Server server;
	DataInputStream din;
	DataOutputStream dout;
	boolean shouldrun = true;

	public ServerConnection(Socket socket, Server server) {
		super("ServerConnectionThread");
		this.socket = socket;
		this.server = server;

	}

	public void sendStringToClient(String text) {
		try {
			dout.writeUTF(text);
			dout.flush();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

	}

	public void sendStringToAllClients(String text) {
		for (int index = 0; index < server.connections.size(); index++) {
			ServerConnection sc = server.connections.get(index);
			sc.sendStringToClient(text);
		}
	}

	//als parameter geef je een string en deze word vervolgens in een xml bestand gezet die aangemaakt word
	public void xmlsturen(String tekst) throws FileNotFoundException {
		// Creating a File object that represents the disk file. 
        PrintStream o = new PrintStream("weatherdata.xml");
  
        // Store current System.out before assigning a new value 
        PrintStream console = System.out; 
  
        // Assign o to output stream 
		System.setOut(o); 
		System.out.println(tekst); 
  
        // Use stored value for output stream 
        System.setOut(console); 
        System.out.println("This will be written on the console!"); 
	}

	@Override
	public void run() {
		try {
			din = new DataInputStream(socket.getInputStream());
			dout = new DataOutputStream(socket.getOutputStream());
			while (shouldrun) {
				while (din.available() == 0) {

					try {
						Thread.sleep(1);
					} catch (InterruptedException e) {

						e.printStackTrace();
					}
				}
				String textIn = din.readUTF();
				
				// checkt of het bericht van de server naar de clients een bericht van de generator is door te kijken of '<WEATHERDATA>' in 'textIn' zit,
				// zo ja, dan roept hij de methode xmlsturen aan die vervolgens een xml bestand aan maakt met de inhoud van 'textIn'
				try {
					if (textIn.contains("<WEATHERDATA>")) {
						xmlsturen(textIn);
					} else {
						System.out.println("testetstetsthjfjewvegdfhbdew");
					}
				} catch (FileNotFoundException e) {
					e.printStackTrace();
				}

				sendStringToAllClients(textIn);
			}

			din.close();
			dout.close();
			socket.close();

		} catch (IOException e) {
			e.printStackTrace();
		}

	}

}
