/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package webservices;

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
 * @author Andrés López
 */
@Path("car")
public class CarResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of CarResource
     */
    public CarResource() {
    }

    /**
     * Retrieves representation of an instance of webservices.CarResource
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public String getJson() {
        String car = "[{\"brand\":\"Chevrolet\",\"model\":\"Spark GT\",\"year\":2020,\"colour\":\"blue\", \"ownerName\":\"Elizabeth Almeida\", "
                + "\"ownerId\":\"1712268791\",\"cylinderCapacity\":1206,\"originCountry\":\"Colombia\",\"plateId\":\"PDL8549\",\"type\":\"Hatchback\"},"
                + "{\"brand\":\"Chevrolet\",\"model\":\"Vitara\",\"year\":2013,\"colour\":\"silver\", \"ownerName\":\"Stalin López\", "
                + "\"ownerId\":\"0914552849\",\"cylinderCapacity\":1995,\"originCountry\":\"Ecuador\",\"plateId\":\"PCB6634\",\"type\":\"Jeep\"},"
                + "{\"brand\":\"Volkswagen\",\"model\":\"Gol Comfort\",\"year\":2003,\"colour\":\"red\", \"ownerName\":\"Andrés López\", "
                + "\"ownerId\":\"1726864679\",\"cylinderCapacity\":1800,\"originCountry\":\"Brazil\",\"plateId\":\"PBQ0044\",\"type\":\"Hatchback\"}, "
                + "{\"brand\":\"Chevrolet\",\"model\":\"Corsa\",\"year\":2005,\"colour\":\"silver\", \"ownerName\":\"Stalin López\", "
                + "\"ownerId\":\"0914552849\",\"cylinderCapacity\":1800,\"originCountry\":\"Ecuador\",\"plateId\":\"ICF0737\",\"type\":\"Sedan\"}"
                + "]";
        return car;
    }

    /**
     * PUT method for updating or creating an instance of CarResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(String content) {
    }
}
