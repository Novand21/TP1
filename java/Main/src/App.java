import java.util.Scanner;

class Movie {
    private String id;
    private String title;
    private String genre;
    private String description;
    private String director;
    
    public Movie(String id, String title, String genre, String description, String director){
        this.id = id;
        this.title = title;
        this.genre = genre;
        this.description = description;
        this.director = director;
    }

    // getters

    public String getId(){
        return id;
    }
    public String getTitle(){
        return title;
    }
    public String getGenre(){
        return genre;
    }
    public String getDescription(){
        return description;
    }
    public String getDirector(){
        return director;
    }

    // setters
    public void setId(String id){
        this.id = id;
    }
    public void setTitle(String title){
        this.title = title;
    }
    public void setGenre(String genre){
        this.genre = genre;
    }
    public void setDescription(String description){
        this.description = description;
    }
    public void setDirector(String director){
        this.director = director;
    }

    // show all

    public void showAllAtributes(){
        System.out.println("----------------------------------\n");
        System.out.println("id: " + id + "\nTitle: " + title + "\nGenre: " + genre + "\nDesc: " + description + "\nDirector: " + director);
        System.out.println("----------------------------------\n");
    }
}



public class App {
    public static void main(String[] args){
        Scanner input = new Scanner(System.in);
        Movie[] listOfMovies = new Movie[10];
        int total = 0;
        listOfMovies[total] = new Movie("1", "Se7en", "Mystery, Drama", "Two detectives try to track down a serial killer who chooses his victims based on the Seven Deadly Sins", "David Finch");
        total++;

        while (true){
            System.out.println("\n========WELCOME========");
            System.out.println("1. Add New Movie\n2. Show Movie List\n3. Update a Movie\n4. Find a Movie\n5. Delete a Movie\n6. Exit");
            System.out.print("Choose: ");
            int choice = input.nextInt();
            input.nextLine();

            // adding datas
            if(choice == 1){
                System.out.print("id: "); 
                String id = input.nextLine();
                System.out.print("Title: "); 
                String title = input.nextLine();
                System.out.print("Genre: "); 
                String genre = input.nextLine();
                System.out.print("Description: "); 
                String desc = input.nextLine();
                System.out.print("Director: "); 
                String director = input.nextLine();
                listOfMovies[total] = new Movie(id, title, genre, desc, director);
                total++;
            }
            // show data
            else if(choice == 2){
                for(int i = 0; i < total; i++){
                    listOfMovies[i].showAllAtributes();
                }
            }

            // update data
            else if(choice == 3){
                System.out.print("ID: "); 
                String id = input.nextLine();
                int num = 0;
                while (num < total){
                    if(listOfMovies[num].getId().equals(id)){
                        System.out.print("Set director: "); 
                        listOfMovies[num].setDirector(input.nextLine());
                        listOfMovies[num].showAllAtributes();
                        break;
                    }
                    num++;
                }
                if (num == total){
                    System.out.print("id not found"); 
                }
            }
            // find id
            else if (choice == 4){
                System.out.print("ID: "); 
                String id = input.nextLine();
                int num = 0;
                while (num < total){
                    if(listOfMovies[num].getId().equals(id)){
                        listOfMovies[num].showAllAtributes();;
                        break;
                    }
                    num++;
                }
                if (num == total){
                    System.out.print("id not found"); 
                }                
            }
            // delete
            else if (choice == 5){
                System.out.print("ID: "); 
                String id = input.nextLine();                
                int num = 0;
                while (num < total){
                    if(listOfMovies[num].getId().equals(id)){
                        for(int i = num; i < total-1; i++){
                            listOfMovies[i] = listOfMovies[i + 1];
                            // pergantian id urut
                            listOfMovies[i].setId(String.valueOf(i + 1));
                        }
                        listOfMovies[total - 1] = null;
                        total--;
                        break;
                    }
                }
            }
            else if(choice == 6){
                break;
            }

        }
        input.close();
    }
}
