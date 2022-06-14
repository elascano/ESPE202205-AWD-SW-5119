/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.university.book;

/**
 *
 * @author Fernando
 */
public class Book {
   String id;
   String name;
   String year;
   String author;

    public Book() {
        id = "";
        author = "";
        name = "";
        year = "";
    }

    public Book(String id, String name, String year, String author) {
        this.id = id;
        this.name = name;
        this.year = year;
        this.author = author;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getYear() {
        return year;
    }

    public void setYear(String year) {
        this.year = year;
    }

    public String getAuthor() {
        return author;
    }

    public void setAuthor(String author) {
        this.author = author;
    }
    
    @Override
    public String toString() {
        return "Book{" + "id=" + id + ", name=" + name + ", year=" + year + ", author=" + author + '}';
    }
}
