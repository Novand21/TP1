

class Movie:
    def __init__(self, id, title, genre, description, director):
        self.__id = id
        self.__title = title
        self.__genre = genre
        self.__description = description
        self.__director = director


    def getId(self):
        return self.__id

    def setDescription(self, newDesc):
        self.__description = newDesc

    def showDesc(self):
        print("----------------------------")
        print("Id: " + self.__id)
        print("\nTitle: " + self.__title)
        print("\nGenre: " + self.__genre)
        print("\nDescription: " + self.__description)
        print("\nDirector: " + self.__director)
        print("----------------------------")





listOfAllMovies = []
total = 0
listOfAllMovies.append(Movie("1", "Se7en", "Mystery, Drama", "Two detectives try to track down a serial killer who chooses his victims based on the Seven Deadly Sins", "David Finch"))
total += 1
choice = -1
while True:
    print("\n========WELCOME========\n1. Add New Movie\n2. Show Movie List\n3. Update a Movie\n4. Find a Movie\n5. Delete a Movie\n6. Exit")
    print("Choice: ")
    choice = int(input())
    if choice == 1:
        print("Id: ")
        id = input()
        print("Title: ")
        title = input()
        print("Genre: ")
        genre = input()
        print("Description: ")
        description = input()
        print("Director: ")
        director = input()
        listOfAllMovies.append(Movie(id, title, genre, description, director))
        print("Succesfully added")
        total += 1
    elif choice == 2:
        print("----- Movie List ------")
        for movie in listOfAllMovies:
            movie.showDesc()
    elif choice == 3:
        print("Id: ")
        id = input()
        index = 0
        while index < total:
            if listOfAllMovies[index].getId() == id:
                print("Description: ")
                desc = input()
                listOfAllMovies[index].setDescription(desc)
                print("Updated")
                break
            index += 1
    elif choice == 4:
        print("Id: ")
        id = input()
        index = 0
        while index < total:
            if listOfAllMovies[index].getId() == id:
                listOfAllMovies[index].showDesc()
            index += 1
    elif choice == 5:
        print("Id: ")
        id = input()
        index = 0
        new_lst = []
        while index < total:
            if listOfAllMovies[index].getId() != id:
                new_lst.append(listOfAllMovies[index])
            index += 1
        listOfAllMovies = new_lst
        total -= 1
    elif choice == 6:
        break


