/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.espe.edu.controller;

import com.google.gson.Gson;
import com.mongodb.client.MongoCollection;
import ec.espe.edu.model.Product;
import java.util.ArrayList;
import org.bson.Document;

/**
 *
 * @author HP
 */
public class ControllerProduct {
      static final ArrayList<Product> list = new ArrayList<Product>();
      
public ArrayList<Product> getProduct() {
    MongoCollection <Document> item = new ConnectionDB().getDB().getCollection("items");
       Gson gson = new Gson();
          ArrayList<String> stringList1 = new ArrayList<>();
        ArrayList<Document> itemList = new ArrayList<>();
        itemList = item.find().into(new ArrayList<>());
        for (Document instructor : itemList) {
            String itemString = instructor.toJson();
            stringList1.add(itemString);
        }
     
    ArrayList<String> stringList = stringList1;
        ArrayList<Product> items = new ArrayList<>();
        Product product= new Product();
        for (String stringWatch  : stringList) {
            product= gson.fromJson(stringWatch,Product.class);
           items.add(product);
        }
        return items;
    
    }
public void postProduct(Product p) {
     MongoCollection <Document> item = new ConnectionDB().getDB().getCollection("items");
      list.add(p);
      for(int i=0;i<list.size();i++){    
    try{
        Document data= new Document();
        data.put("idItem",list.get(i).getIdItem());
        data.put("name",list.get(i).getName());
        data.put("itemBrand",list.get(i).getItemBrand());
        data.put("description",list.get(i).getDescription());
        data.put("price",list.get(i).getPrice());
        item.insertOne(data);
       }catch(Exception err){
       }
    }
      list.remove(p);
    }

 public void putJson( int id, Product content) {
    MongoCollection <Document> item = new ConnectionDB().getDB().getCollection("items");
    Document findDocument = new Document("idItem",id);
    Document updateDocument1 = new Document("$set",
        new Document("name",content.getName()));
    Document updateDocument2 = new Document("$set",
        new Document("itemBrand",content.getItemBrand()));
    Document updateDocument3 = new Document("$set",
        new Document("description",content.getDescription()));
    Document updateDocument4 = new Document("$set",
        new Document("price",content.getPrice()));
    item.findOneAndUpdate(findDocument, updateDocument1);
    item.findOneAndUpdate(findDocument, updateDocument2);
    item.findOneAndUpdate(findDocument, updateDocument3);
    item.findOneAndUpdate(findDocument, updateDocument4);

    }
 public  void deleteProduct( int id) {
       MongoCollection <Document> item = new ConnectionDB().getDB().getCollection("items");
       Document findDocument = new Document("idItem",id);
       item.findOneAndDelete(findDocument);
    }

}
