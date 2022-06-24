/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.espe.edu.rest;

import ec.espe.edu.controller.ControllerProduct;
import ec.espe.edu.model.Product;
import java.util.ArrayList;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.DELETE;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author HP
 */
@Path("Product")
public class ProductResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of ProductResource
     */
    public ProductResource() {
    }
    
    ControllerProduct product= new ControllerProduct();

    @GET
    @Path("list")
    @Produces(MediaType.APPLICATION_JSON)
    public ArrayList<Product> getJson() {
        return product.getProduct();
    }
    
    @PUT
    @Path("{id}")
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(@PathParam("id") int id, Product content) {
        product.putJson(id, content);
    }
    
    @POST
    @Path("create")
    @Consumes(MediaType.APPLICATION_JSON)
    @Produces(MediaType.APPLICATION_JSON)
    public void postJson(Product content)
    {
        product.postProduct(content);
    }
    
    @DELETE
    @Path("{id}")
    public void deleteJson(@PathParam("id") int id)
    {
        product.deleteProduct(id);
    }
    
}
