import { Column, Entity, PrimaryGeneratedColumn } from "typeorm";

@Entity("log_webserver", { schema: "ITEAMS" })
export class LogWebserver {
  @PrimaryGeneratedColumn({ type: "int", name: "id" })
  id: number;

  @Column("varchar", { name: "ip_adress", nullable: true, length: 2000 })
  ipAdress: string | null;

  @Column("datetime", { name: "date_heure", nullable: true })
  dateHeure: Date | null;

  @Column("varchar", { name: "methode", nullable: true, length: 2500 })
  methode: string | null;

  @Column("varchar", { name: "routes", nullable: true, length: 2500 })
  routes: string | null;

  @Column("varchar", { name: "protocole", nullable: true, length: 2500 })
  protocole: string | null;

  @Column("int", { name: "code_retour", nullable: true })
  codeRetour: number | null;

  @Column("varchar", { name: "user_agent", nullable: true, length: 2500 })
  userAgent: string | null;
}
