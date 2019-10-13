import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { HttpHeaders } from '@angular/common/http';
import { catchError } from 'rxjs/operators';

const httpOptions = {
  headers: new HttpHeaders({
    'Content-Type': 'application/json'
  })
};

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  constructor(public http: HttpClient) { }

  getProducts(): Observable<Array<object>> {

    return this.http.get<Array<object>>('http://127.0.0.1:8000/api/products');
  }

  addProduct(newProduct): Observable<Array<object>> {
    console.log(newProduct)
    return this.http.post<Array<object>>('http://127.0.0.1:8000/api/product', JSON.stringify(newProduct), httpOptions)
  }

  loginUser(username:string, password:string) {
    return this.http.post('http://127.0.0.1:8000/api/login', {
      email: username,
      password: password, 
    });
  }
  // loginUser(newUser): Observable<Array<object>> {
  //   console.log(newUser)
  //   return this.http.post<Array<object>>('http://127.0.0.1:8000/login', JSON.stringify(newUser), httpOptions)
  // }
}
