import { Component } from '@angular/core';
import { ApiService } from 'src/app/services/api.service';
import { ActivatedRoute, Router } from '@angular/router';
import { Subscription } from 'rxjs';
import { Product } from '../../Product';
@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.css']
})
export class FormComponent {
  public products: Product[];
  public productos: string;
  public descripcion:string;
  public cantidad: number;
  
  public paramsSubscription: Subscription;
  constructor(public apiService: ApiService,
    public route: ActivatedRoute, private router: Router) { }

  addProduct(event): void {
    event.preventDefault();
    var newProduct = {
      productos: this.productos,
      descripcion: this.descripcion,
      cantidad: this.cantidad
    }

    this.apiService.addProduct(newProduct)
      .subscribe(product => {
        this.productos = '';
        this.descripcion = '';
        this.cantidad = 0;
        this.router.navigate(['/productos']);
      });
  }
}
