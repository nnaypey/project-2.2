package client;

import java.io.IOException;
import java.net.Socket;
import java.net.UnknownHostException;
import java.util.Scanner;

public class Client {

	ClientConnection cc;

	public static void main(String[] args) {
		new Client();

	}

	public Client() {
		try {
			Socket s = new Socket("localhost", 7789);
			cc = new ClientConnection(s, this);
			cc.start();

			listenForInput();

		} catch (UnknownHostException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}
	}

	public void listenForInput() {
		Scanner console = new Scanner(System.in);

		while (true) {
			while (!console.hasNextLine()) {
				try {
					Thread.sleep(1); // 1 ms
				} catch (InterruptedException e) {
					e.printStackTrace();
				}
			}
			String input = console.nextLine();

			// quit ontsnappen.
			if (input.toLowerCase().equals("quit")) {
				System.out.println("gestopt");
				break;
			}

			cc.sendStringToServer(input);

		}

		//console.close();
		//cc.close();

	}

}
