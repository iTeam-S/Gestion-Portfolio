import { Column, Entity, PrimaryGeneratedColumn } from "typeorm";

@Entity("categorie_competence", { schema: "ITEAMS" })
export class CategorieCompetence {
  @PrimaryGeneratedColumn({ type: "int", name: "id" })
  id: number;

  @Column("varchar", { name: "categorie", length: 150 })
  categorie: string;

  @Column("varchar", { name: "icone", length: 150 })
  icone: string;
}
