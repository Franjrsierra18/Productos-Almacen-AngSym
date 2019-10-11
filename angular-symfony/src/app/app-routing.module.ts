import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { MainComponent } from './components/main/main.component';
import { AlmacenTablesComponent } from './components/almacen-tables/almacen-tables.component';
import { FormComponent } from './components/form/form.component';
import { RegistroComponent } from './components/registro/registro.component';


const routes: Routes = [
  { path: '', component: MainComponent, pathMatch:'full'},
  { path: 'productos', component: AlmacenTablesComponent},
  { path: 'Addproductos', component: FormComponent},
  { path: 'registro', component: RegistroComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
