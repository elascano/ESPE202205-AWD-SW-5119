/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package webservices;

import ec.edu.espe.university.book.Book;
import ec.edu.espe.university.book.Connection;
import java.util.ArrayList;
import java.util.HashSet;
import java.util.List;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author Fernando
 */
@Path("book")
public class BookResources {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of BookResources
     */
    public BookResources() {
    }

    /**
     * Retrieves representation of an instance of webservices.BookResources
     * @return an instance of java.lang.String
     */
    

    
    @GET
    @Path("{name}")
    @Produces(MediaType.APPLICATION_JSON)
    public Book getNameBook(@PathParam("name") String name) {
        Book book = new Book();
        Connection dataBasebook= new Connection("Book");
        book = dataBasebook.getBookByName(name);
        return book;
    }
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public List<Book> getBookSearch() {
        List<Book> bookModels = new ArrayList<>();
        Connection dataBasebook= new Connection("Book");
        bookModels = dataBasebook.getAllBook();
        return bookModels;
    }


    /**
     * PUT method for updating or creating an instance of BookResources
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(String content) {
    }
}
