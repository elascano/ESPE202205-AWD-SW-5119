import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { Observable } from "rxjs";
@Injectable()
export class freeApiService
{
    constructor (private http:HttpClient){}
    getcomments():Observable<any>{
        //return this.http.get("https://jsonplaceholder.typicode.com/posts/1/comments");
        //return this.http.get("http://newchris.jelastic.saveincloud.net/webresources/items/7");
         return this.http.get("http://localhost:5000/users");
       // return this.http.get("https://jsonplaceholder.typicode.com/users");
    }
}