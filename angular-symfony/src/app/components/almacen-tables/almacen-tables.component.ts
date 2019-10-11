import { Component, OnInit } from '@angular/core';
import { ApiService } from 'src/app/services/api.service';
import { ActivatedRoute } from '@angular/router';
import { Subscription } from 'rxjs';


@Component({
  selector: 'app-almacen-tables',
  templateUrl: './almacen-tables.component.html',
  styleUrls: ['./almacen-tables.component.css']
})
export class AlmacenTablesComponent {
  public products: Array<object>;
  public paramsSubscription: Subscription;
  constructor(public apiService: ApiService,
    public route: ActivatedRoute) { }

  ngOnInit() {//inicia el component
    this.paramsSubscription = this.route.paramMap.subscribe(paramsMap => {//nos suscribimos a cambios en los parámetros de la url ej: /movie/movies o /movie/upcoming

      this.getProducts()//upcoming o /movies
    })
  }
  getProducts() {
    this.apiService.getProducts().subscribe(
      res => {
        this.products = res;
        console.log(this.products)
      },
      error => console.log(error)
    );
  }
}
