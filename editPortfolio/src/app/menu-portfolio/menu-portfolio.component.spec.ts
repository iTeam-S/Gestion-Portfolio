import { ComponentFixture, TestBed } from '@angular/core/testing';

import { MenuPortfolioComponent } from './menu-portfolio.component';

describe('MenuPortfolioComponent', () => {
  let component: MenuPortfolioComponent;
  let fixture: ComponentFixture<MenuPortfolioComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ MenuPortfolioComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(MenuPortfolioComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
