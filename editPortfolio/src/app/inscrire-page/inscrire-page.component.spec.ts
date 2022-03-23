import { ComponentFixture, TestBed } from '@angular/core/testing';

import { InscrirePageComponent } from './inscrire-page.component';

describe('InscrirePageComponent', () => {
  let component: InscrirePageComponent;
  let fixture: ComponentFixture<InscrirePageComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ InscrirePageComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(InscrirePageComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
