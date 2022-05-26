/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.espe.webservices;

import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author yulia
 */
@Path("dog")
public class DogResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of DogResource
     */
    public DogResource() {
    }

    /**
     * Retrieves representation of an instance of
     * ec.edu.espe.webservices.DogResource
     *
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.TEXT_PLAIN)
    public String getText() {
        String dog = "[{\"name\":\"Lulu\", \"owner\":\"Jose\", \"age\":2, \"weight\":1.0, \"breed\":\"schnauzer\"}, {\"name\":\"Luna\", \"owner\":\"Juan\", \"age\":5,\"weight\":2.0, \"breed\":\"beagle\"}, {\"name\":\"Coco\", \"owne0r\":\"Vanessa\", \"age\":3, \"weight\":1.0, \"breed\":\"chihuaga\"}, {\"name\":\"Toby\",\"owner\":\"Melanie\", \"age\":1, \"weight\":2.0, \"breed\":\"schnauzer\"}]";
        //String dog = "{\name\":\"lulu\", \"owner\": \"Jose\", \"age\": 2 , \"weight\": 1, \"breed\":\"schnauzer\"}";
        return dog;
    }

    /**
     * PUT method for updating or creating an instance of DogResource
     *
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.TEXT_PLAIN)
    public void putText(String content) {
    }
}
