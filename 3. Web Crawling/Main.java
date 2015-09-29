import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.MalformedURLException;
import java.net.URL;

import org.jsoup.Jsoup;
import org.jsoup.helper.Validate;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;
import org.jsoup.select.Elements;


public class Main {
   public static void main(String[] args) throws Exception {
	  //DOWNLOADING
	  String URLsource = "http://www.itb.ac.id/";
	  saveFile(URLsource, "source.html");
      
      //PARSING HYPERLINK WHILE DOWNLOADING
      Document doc = Jsoup.connect(URLsource).get();
      Elements links = doc.select("a[href]");
      Elements media = doc.select("[src]");
      Elements imports = doc.select("link[href]");

      print("\nMedia: (%d)", media.size());
      for (Element src : media) {
          if (src.tagName().equals("img"))
              print(" * %s: <%s> %sx%s (%s)",
                      src.tagName(), src.attr("abs:src"), src.attr("width"), src.attr("height"),
                      trim(src.attr("alt"), 20));
          else
              print(" * %s: <%s>", src.tagName(), src.attr("abs:src"));
          saveFile(src.attr("abs:src"), extractFileName(src.attr("abs:src")));
      };

      print("\nImports: (%d)", imports.size());
      for (Element link : imports) {
          print(" * %s <%s> (%s)", link.tagName(),link.attr("abs:href"), link.attr("rel"));
      }

      print("\nLinks: (%d)", links.size());
      for (Element link : links) {
          print(" * a: <%s>  (%s)", link.attr("abs:href"), trim(link.text(), 35));
      }
      
      
   }


	private static void print(String msg, Object... args) {
	    System.out.println(String.format(msg, args));
	}
	
	private static String trim(String s, int width) {
	    if (s.length() > width)
	        return s.substring(0, width-1) + ".";
	    else
	        return s;
	}
	
	public static String extractFileName(String path) {

	    if ( path == null)
	    {
	      return null;
	    }
	    String newpath = path.replace('\\','/');
	    int start = newpath.lastIndexOf("/");
	    if ( start == -1)
	    {
	      start = 0;
	    }
	    else
	    {
	      start = start + 1;
	    }
	    String pageName = newpath.substring(start, newpath.length());

	    return pageName;
	  }
	
	public static void saveFile(String urlString, String urlName) throws Exception{
	      URL url = new URL(urlString);
	      BufferedReader reader = new BufferedReader
	      (new InputStreamReader(url.openStream()));
	      BufferedWriter writer = new BufferedWriter
	      (new FileWriter(urlName));
	      String line;
	      while ((line = reader.readLine()) != null) {
	         //System.out.println(line);
	         writer.write(line);
	         writer.newLine();
	      }
	      reader.close();
	      writer.close();
	}
	
	
}
