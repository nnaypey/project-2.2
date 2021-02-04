public class radiuscheck {

    static boolean isInside(double circle_x, double circle_y,  
                                 double rad, double x, double y) 
    { 
        // Compare radius of circle with 
        // distance of its center from 
        // given point 
        if ((x - circle_x) * (x - circle_x) + 
            (y - circle_y) * (y - circle_y) <= rad * rad) 
            return true; 
        else
            return false; 
    } 

    // Driver Program to test above function 
    public static void main(String arg[]) 
    { 
        double x = 1.117, y = 104.117; 
        double circle_x = 1.290270, circle_y = 103.851959, rad = 9.009009009009009009009009009009; 
  
        if (isInside(circle_x, circle_y, rad, x, y)) 
            System.out.print("Inside"); 
        else
            System.out.print("Outside"); 
    } 

}
