import { View, Text, StyleSheet } from 'react-native';
import NavBar from '../nav-bar';
import TopBar from '../top-bar';

export default function Dashboard() {
  return (
    <View style={styles.container}>
      <TopBar />
      <View style={styles.content}>
        <Text style={styles.title}>Tableau de Bord</Text>
      </View>
      <NavBar />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
  },
  content: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    padding: 20,
  },
  title: {
    fontSize: 24,
    fontWeight: 'bold',
    color: '#362E7D',
  },
});
