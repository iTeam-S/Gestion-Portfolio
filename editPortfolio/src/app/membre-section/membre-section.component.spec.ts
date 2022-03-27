import { ComponentFixture, TestBed } from '@angular/core/testing';

import { MembreSectionComponent } from './membre-section.component';

describe('MembreSectionComponent', () => {
  let component: MembreSectionComponent;
  let fixture: ComponentFixture<MembreSectionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ MembreSectionComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(MembreSectionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
