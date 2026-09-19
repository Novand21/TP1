#include <iostream>
#include <string>
using namespace std;


class Movie {
private:
    string id, title, genre, description, director;
public:
    Movie(){

    }

    Movie(string id, string title, string genre, string description, string director){
        this->id = id;
        this->title = title;
        this->genre = genre;
        this->description = description;
        this->director = director;
    }

    // getters
    string getId(){
        return id;
    }

    void setGenre(string newGenre){
        genre = newGenre;
    }

    void show(){
        cout << "--------------------------------------------------" << endl;
        cout << "id: " << id << "\ntitle: " << title << "\ngenre: " << genre << "\ndescription: " << description << "\ndirector: " << director << endl;
        cout << "--------------------------------------------------" << endl;
    }

};

void showAll(Movie listOfMovies[], int total){
    for(int i = 0; i < total; i++){
        listOfMovies[i].show();
    }
}

int main(){
    Movie listOfMovies[10];
    int total = 0;
    int choose;
    listOfMovies[total] = Movie("1", "Se7en", "Mystery, Drama", "Two detectives try to track down a serial killer who chooses his victims based on the Seven Deadly Sins", "David Finch");
    total++;

    while(true){
        cout << "\n========WELCOME========\n1. Add New Movie\n2. Show Movie List\n3. Update a Movie\n4. Find a Movie\n5. Delete a Movie\n6. Exit";
        cout << "\nChoice: ";
        cin >> choose;

        // add movie
        if(choose == 1){
            string id, title, genre, description, director;
            cout << "id: ";
            cin >> id;
            cout << "title: ";
            cin >> title;
            cout << "genre: ";
            cin >> genre;
            cout << "description: ";
            cin >> description;
            cout << "director: ";
            cin >> director;

            listOfMovies[total] = Movie(id, title, genre, description, director);
            total++;
            cout << "Success" << endl;
        }
        // show movie
        else if(choose == 2){
            showAll(listOfMovies, total);
        }
        // update movie
        else if(choose == 3){
            string id;
            string genre;
            cout << "Id: ";
            cin >> id;
            
            int index = 0;
            while(index < total){
                if(listOfMovies[index].getId() == id){
                    cout << "Genre: ";
                    cin >> genre;
                    listOfMovies[index].setGenre(genre);
                    break;
                }
                index++;
            }

        }
        // find movie
        else if(choose == 4){
            string id;
            cout << "Id: ";
            cin >> id;

            int index = 0;
            while(index < total){
                if(listOfMovies[index].getId() == id){
                    listOfMovies[index].show();
                    break;
                }
                index++;
            }

        }

        // delete movie
        else if(choose == 5){
            string id;
            cout << "Id: ";
            cin >> id;

            int index = 0;
            while(index < total){
                if(listOfMovies[index].getId() == id){
                    for(int i = index; i < total-1; i++){
                        listOfMovies[i] = listOfMovies[i + 1];
                    }
                    total--;
                    cout << "Data deleted" << endl;
                    break;
                }
                index++;
            }
        }
        else if (choose == 6){
            cout << "Quit" << endl;
            break;
        }

    }
    return 0;
}